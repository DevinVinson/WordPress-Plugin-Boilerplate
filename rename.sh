#!/usr/bin/env bash

#
# ./rename.sh 'Your_Plugin_Name'
# github.com/tarkusdev
# not liable for this
#

(( $# < 1 )) && echo "Usage: ./rename.sh 'Your_Plugin_Name'" && exit 1
[[ ! -d 'plugin-name' ]] && echo "Missing 'plugin-name' directory." && exit 1

plugin_name="${@//[- ]/_}"  # Replace hyphens and spaces with underscores
lowercase="${plugin_name,,}"
uppercase="${plugin_name^^}"
hyphenated="${lowercase//_/-}"

for f in $(find . -type f -not -name 'class-plugin-name.php' -not -path '*/\.*')
do
  # Replace plugin-name text to user input
  sed -i \
    -e "s/plugin-name/$hyphenated/g" \
    -e "s/plugin_name/$lowercase/g" \
    -e "s/Plugin_Name/$plugin_name/g" \
    -e "s/PLUGIN_NAME_/${uppercase}_/g" \
    "$f"

  # Rename files from plugin-name to user input
  n="${f/#*\//}"  # Get filename from file path
  n="${n//plugin-name/$hyphenated}"  # Replace plugin-name with user input

  # Skip the files that do not need to be renamed
  [[ "$n" == *"$hyphenated"* ]] && mv "$f" "${f%/*}/$n"
done

mv ./plugin-name "./$hyphenated"
