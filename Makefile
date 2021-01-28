install:
	composer install

lint:
	composer exec --verbose phpcs -- --standard=PSR12 task1 task2 task4 tests

lint-fix:
	composer exec --verbose phpcbf -- --standard=PSR12 task1 task2 task4 tests

test:
	composer exec --verbose phpunit tests