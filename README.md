# Composer template for Drupal projects

This repository is a clone of [drupal-project repo](https://github.com/drupal-composer/drupal-project).

It is configured with frequently used modules to quickly jump start your project.

## Quick start local development
Use docker-compose [setup for local development](https://github.com/pagach/docker-compose-lamp).

To quick start the project execute:

```shell
git clone https://github.com/pagach/docker-compose-lamp.git &&
chmod +x docker-compose-lamp/setup.sh &&
./docker-compose-lamp/setup.sh &&
cp .env.local .env &&
./docker-compose-lamp/scripts/server-start.sh &&
./docker-compose-lamp/scripts/drush-importdump.sh
```

Access your project via link shown during installation.
