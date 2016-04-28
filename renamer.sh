#!/bin/bash

if [ -n "${BASH_VERSINFO[0]}" ] && [ ${BASH_VERSINFO[0]} -gt 3 ]; then
	# Updated: 20-Aug-2009 - for bash version 4
	strtolower() {
		[ $# -eq 1 ] || return 1;
		echo ${1,,};
		return 0;
	}
else
	strtolower() {
		[ $# -eq 1 ] || return 1;
		local _str _cu _cl _x;
		_cu=(A B C D E F G H I J K L M N O P Q R S T U V W X Y Z);
		_cl=(a b c d e f g h i j k l m n o p q r s t u v w x y z);
		_str=$1;
		for ((_x=0;_x<${#_cl[*]};_x++)); do
			_str=${_str//${_cu[$_x]}/${_cl[$_x]}};
		done;
		echo $_str;
		return 0;
	}
fi

if [ -n "${BASH_VERSINFO[0]}" ] && [ ${BASH_VERSINFO[0]} -gt 3 ]; then
	# Updated: 20-Aug-2009 - for bash version 4
	strtoupper() {
		[ $# -eq 1 ] || return 1;
		echo ${1^^};
		return 0;
	}
else
	strtoupper() {
		[ $# -eq 1 ] || return 1;
		local _str _cu _cl _x;
		_cu=(A B C D E F G H I J K L M N O P Q R S T U V W X Y Z);
		_cl=(a b c d e f g h i j k l m n o p q r s t u v w x y z);
		_str=$1;
		for ((_x=0;_x<${#_cl[*]};_x++)); do
			_str=${_str//${_cl[$_x]}/${_cu[$_x]}};
		done;
		echo $_str;
		return 0;
	}
fi

ucwords() {
	[ $# -eq 1 ] || return 1;
	! type -t strtoupper &>/dev/null && return 1;
	local _x _c _p _ret="" _str="$1";
	_p=0;
	for ((_x=0;_x<${#_str};_x++)); do
		_c=${_str:$_x:1};
		if [ "$_c" != " " ] && [ "$_p" = "0" ]; then
			_ret+="$(strtoupper "$_c")";
			_p=1;continue;
		fi;
		[ "$_c" = " " ] && _p=0;
		_ret+="$_c";
	done;
	if [ -n "${_ret:-}" ]; then
		echo "${_ret}";
		return 0;
	fi;
	return 1;
}

echo "This script will rename your plugin and its contents. It will update some basic fields in your README and init file."

echo "Please enter your plugin name:"
read plugin_name

plugin_suggested="${plugin_name// /-}"
plugin_suggested=$(strtolower $plugin_suggested)

echo "Please enter your desired rename (all lowercase). This will replace all instances of plugin-name."
echo "Suggestion: $plugin_suggested (Hit enter to accept)"
read plugin_desired

if [ -z "$plugin_desired" ]; then
	plugin_desired=$plugin_suggested
fi

echo "Please enter your plugin description:"
read plugin_description

echo "Please enter your name:"
read plugin_author

echo "Please enter your email:"
read plugin_email

plugin_functions="${plugin_desired// /_}"
plugin_functions="${plugin_desired//-/_}"
plugin_css="${plugin_desired// /-}"

plugin_classes="${plugin_desired//-/ }"
plugin_classes="${plugin_classes//_/ }"
plugin_classes=$(ucwords "$plugin_classes")
plugin_classes="${plugin_classes// /_}"

plugin_constants=$(strtoupper "$plugin_classes")

echo ""
echo "Your details will be:"
echo ""
echo "Plugin Name: $plugin_name"
echo "Plugin Description: $plugin_description"
echo "Plugin Author: $plugin_author"
echo "Plugin Author Email: $plugin_email"
echo "Functions: $plugin_functions"
echo "Files: $plugin_css"
echo "Plugin Classes: $plugin_classes"
echo "Plugin Constants: $plugin_constants"

echo "Confirm? (y/n)"
read confirmation

if [ "$confirmation" == "y" ]; then

	# Replace "plugin-name"
	replacestring="s/plugin-name/$plugin_css/g"
	find ./plugin-name -type f -exec sed -i '' -e "$replacestring" '{}' \;

	# Replace "plugin_name"
	replacestring="s/plugin_name/$plugin_functions/g"
	find ./plugin-name -type f -exec sed -i '' -e "$replacestring" '{}' \;

	# Replace "Plugin_Name"
	replacestring="s/Plugin_Name/$plugin_classes/g"
	find ./plugin-name -type f -exec sed -i '' -e "$replacestring" '{}' \;

	# Replace "PLUGIN_NAME"
	replacestring="s/PLUGIN_NAME/$plugin_constants/g"
	find ./plugin-name -type f -exec sed -i '' -e "$replacestring" '{}' \;

	# Replace author
	replacestring="s/Your Name or Your Company/$plugin_author <$plugin_email>/g"
	find ./plugin-name -type f -exec sed -i '' -e "$replacestring" '{}' \;

	replacestring="s/Your Name <email@example.com>/$plugin_author <$plugin_email>/g"
	find ./plugin-name -type f -exec sed -i '' -e "$replacestring" '{}' \;

	# Cleanup core file
	replacestring="s/WordPress Plugin Boilerplate/$plugin_name/g"
	sed -i '' -e "$replacestring" ./plugin-name/plugin-name.php

	replacestring="s/This is a short description of what the plugin does. It's displayed in the WordPress admin area./$plugin_description/g"
	sed -i '' -e "$replacestring" ./plugin-name/plugin-name.php

	#Rename top level directory
	mv "plugin-name" "$plugin_css"

	for file in `find . -name "*plugin-name*" -type f`; do
		DIR=$(dirname "${VAR}")
		mkdir -p $DIR
		mv "$file" "${file/plugin-name/$plugin_css}"
	done

else
	echo "Cancelled."
fi
