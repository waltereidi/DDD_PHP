sudo chmod 777 /var/run/docker.sock

sudo symfony console doctrine:database:create 
sudo symfony console doctrine:migrations:migrate --allow-no-migration   

sudo symfony console doctrine:database:create --env=test
sudo symfony console doctrine:migrations:migrate --env=test --allow-no-migration   
