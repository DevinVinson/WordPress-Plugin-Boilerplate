#!/bin/sh

.DEFAULT_GOAL := help
.PHONY: $(filter-out vendor node_modules, $(MAKECMDGOALS))

install:
	composer install
	composer phpunit

install-prod:
	composer install-prod

test:
	@composer test

build:
	@composer build

help:
	@echo Silence is golden

vendor: composer.json $(wildcard composer.lock) ## Install PHP application
	@composer install

node_modules: $(wildcard package.json) $(wildcard package.lock) ## Install Node modules
	@npm install
