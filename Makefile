# Include
include config.mk

## Tasks:
help:
	@fgrep -h "##" $(MAKEFILE_LIST) | fgrep -v fgrep | sed -e 's/\\$$//' | sed -e 's/##//'

## install-composer-docker : Donwload compoer from docker hub
install-composer-docker:
	docker pull composer;

## composer-update-docker : Run composer update form docker
composer-update-docker:
	docker run --rm -v $(PWD):/app composer update --prefer-dist -o $(COMPOSER_IGNORE_REQ) $(COMPOSER_DEV)

## composer-update : Run composer update form docker
composer-update:
	sudo ./composer update --prefer-dist -o $(COMPOSER_IGNORE_REQ) $(COMPOSER_DEV)

## git-checkout-tag : Checkout tag of repository
git-checkout-tag:
	@git fetch --all --tags --prune
	@git tag
	@read -p "Insert tag:" tag; \
	git checkout tags/$$tag

## deploy-prod : Deploy tool for production
deploy-prod: composer-update git-checkout-tag
	@rsync -avh ./ ${WORKING_PATH}/${WORKING_DIR} \
     		--delete \
     		--exclude 'data' \
     		--exclude 'tests' \
     		--exclude '.git' \
     		--exclude '.idea' \
     		--exclude 'docker' \
     		--exclude '.gitignore' \
     		--exclude 'composer.json' \
     		--exclude 'composer.lock' \
     		--exclude 'composer.phar' \
     		--exclude 'config.mk' \
     		--exclude 'config.mk.dist' \
     		--exclude 'docker-compose.yml' \
     		--exclude 'docker-compose.yml.dist' \
     		--exclude 'Makefile' \
     		--exclude 'phpunit.xml.dist' \
     		--exclude 'README.md'