DOCKER_COMPOSE = docker-compose
DOCKER = docker

start: ## Start the environment
    $(DOCKER_COMPOSE) up -d --remove-orphans

stop: ## Stop the environment
    $(DOCKER_COMPOSE) stop

build: ## Build the environment
    $(DOCKER_COMPOSE) build

restart: ## Restart the environment
    $(DOCKER_COMPOSE) restart

shell: ## Open a shell in the php container
    $(DOCKER_COMPOSE) exec php bash

analyse: ## Run PHPStan static analysis
    $(DOCKER_COMPOSE) exec php vendor/bin/phpstan analyse app --level=8

composer-install: ## Install Composer dependencies from the "php" container
    $(DOCKER_COMPOSE) exec php composer install --optimize-autoloader

composer-update: ## Update Composer dependencies from the "php" container
    $(DOCKER_COMPOSE) exec php composer update --optimize-autoloader

migration: ## Launch migrations installation
    $(DOCKER_COMPOSE) exec php php migrations/Tools/script.php

clean: ## Clean volume data
	$(DOCKER) system prune --volumes
