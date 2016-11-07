# Wedive Api

## Introduction

This is the api set of wedive

## Prerequisites

1. Install [Docker](https://docs.docker.com/engine/installation/) and [Docker-compose](https://docs.docker.com/compose/install/)

2. Pull docker composer image:
```
 $ docker pull composer/composer
```

3. Add alias in your hosts file;
```
127.0.0.69      wedive-api
```

## Remember

manual mongo import:
```
mongoexport --db wedives_image --collection place-gallery --out data/db/wedives-gallery.json

mongoimport --db wedives --collection user --file path-to-json
mongoimport --db wedives --collection place --file path-to-json
mongoimport --db wedives_image --collection place-cover --file path-to-json

scp docker/mongo/data/wedives-gallery.json root@vps330252.ovh.net:/var/www/develop/
```

## Build

* 
