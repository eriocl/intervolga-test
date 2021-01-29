install:
	composer install

lint:
	composer exec --verbose phpcs -- --standard=PSR12 task1 task2 task4 task5 -l task5/class tests

lint-fix:
	composer exec --verbose phpcbf -- --standard=PSR12 task1 task2 task4 task5 -l task5/class tests

test:
	composer exec --verbose phpunit tests