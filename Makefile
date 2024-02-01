# Makefile for Laravel Project

# Variables
COMPOSER = composer
PHP = php
ARTISAN = $(PHP) artisan
# SERVER_HOST = 192.168.31.90
SERVER_HOST = 172.20.10.3
SERVER_PORT = 8084
VHOST_FILE = /path/to/apache/conf/httpd.conf  # Update this path
PROJECT_ROOT = $(shell pwd)

# Targets
.PHONY: install serve migrate test

install:
	@$(COMPOSER) install
run:
	@$(ARTISAN) serve --host=$(SERVER_HOST) --port=$(SERVER_PORT)
migrate:
	@$(ARTISAN) migrate
test:
	@$(PHP) vendor/bin/phpunit

update-hosts:
	@echo "$(SERVER_HOST) laravel.local" | sudo tee -a /etc/hosts

setup-vhost:
	@echo "Setting up Apache Virtual Host..."
	@echo "<VirtualHost $(SERVER_HOST):80>" > $(VHOST_FILE)
	@echo "    DocumentRoot \"$(PROJECT_ROOT)/public\"" >> $(VHOST_FILE)
	@echo "    ServerName laravel.local" >> $(VHOST_FILE)
	@echo "    <Directory \"$(PROJECT_ROOT)/public\">" >> $(VHOST_FILE)
	@echo "        AllowOverride All" >> $(VHOST_FILE)
	@echo "        Require all granted" >> $(VHOST_FILE)
	@echo "    </Directory>" >> $(VHOST_FILE)
	@echo "</VirtualHost>" >> $(VHOST_FILE)
	@echo "Virtual Host configured. Don't forget to restart Apache."

