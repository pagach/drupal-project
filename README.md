# Composer template for Drupal projects

This repository is a clone of [drupal-project repo](https://github.com/drupal-composer/drupal-project).

It is configured with frequently used modules to quickly jump start your project.

## Quick start local development
Use docker-compose [setup for local development](https://github.com/pagach/docker-compose-lamp).

To quick start the project execute:

```shell
git clone https://github.com/pagach/docker-compose-lamp.git &&
cd docker-compose-lamp &&
chmod +x docker-compose-lamp/setup.sh &&
./docker-compose-lamp/setup.sh &&
cp .env.local .env
```

Access your project via link shown during installation.

If you have a database that you would like to import, you can do that quickly by placing `init.sql.gz` file
to `dumps` in project root. After that execute:

```shell
./docker-compose-lamp/scripts/drush-importdump.sh
```
