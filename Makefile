#########################################
# 	     Variabiles                 #
#########################################

# Dev mod
COMPOSER_DEV =
# Cliend id 
CLIENT_ID = strapieno-admin
# Production folder
PROD_SYNC_FOLDER = wedive-api-sync


ADMIN_USERNAME = admin
ADMIN_EMAIL = admin@strapieno.it

# start download pre setup
install-composer:
	docker pull composer/composer;	

# star setup platform
composer:
	docker run --rm -v $(PWD):/app composer/composer update --ignore-platform-reqs --prefer-dist -o $(COMPOSER_DEV)

dcu:
	docker-compose up -d

test:dcu
	docker exec -it skeleton_fpm_1 bash -c 'cd /var/www/str-skeleton && vendor/bin/phpunit'

install: install-composer dcu
	docker exec -it skeleton_fpm_1 bash -c 'cd str-skeleton && php ./vendor/bin/str-user-model.php add-user --username=${ADMIN_USERNAME} --email=${ADMIN_EMAIL}'
	docker exec -it skeleton_fpm_1 bash -c 'cd str-skeleton && php ./vendor/bin/str-auth-model.php add-client --clientId=${CLIENT_ID} OauthClient'

sync-prod:
	 rsync -avh ./ ../${PROD_SYNC_FOLDER}/ --deleteq

	 q

	 fq


