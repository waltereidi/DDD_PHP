sudo chmod 666 /var/run/docker.sock

sudo symfony console doctrine:database:create 
sudo symfony console doctrine:migrations:migrate --dry-run

sudo symfony console doctrine:database:create --env=test
sudo symfony console doctrine:migrations:migrate --env=test --dry-run
