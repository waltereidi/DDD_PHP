sudo chmod 777 /var/run/docker.sock

php bin/console cache:pool:clear --all
symfony server:start --port=55555  --allow-cors  --listen-ip=0.0.0.0
composer require symfony/orm-pack
composer require --dev symfony/maker-bundle

sudo symfony console doctrine:database:create 
sudo symfony console doctrine:migrations:migrate --allow-no-migration   

sudo symfony console doctrine:database:create --env=test
sudo symfony console doctrine:migrations:migrate --env=test --allow-no-migration   
