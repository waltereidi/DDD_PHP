buildwithrepos:
	docker build --build-arg GITREPOSBACKPARAM=https://github.com/waltereidi/bibliotecaonline.git \
	--build-arg GITREPOSFRONTPARAM=https://github.com/waltereidi/loja-frontend.git \
	--build-arg USERNAME=walter \
	--build-arg UID=1000 \
	--build-arg GID=1000 -t debian12 . 

build:
	docker build --build-arg USERNAME=walter \
	--build-arg UID=1000 \
	--build-arg GID=1000 -t debian12 . 
run:
	docker run -d \
	-p 8000:8000 \
	-p 8001:8001 \
	-p 5432:5432 \
	-p 5173:5173 \
	-p 55555:55555 \
	--volume=./../back:/var/www/back \
	--volume=./../front:/var/www/front \
	--volume=./docker/back.conf:/etc/nginx/sites-available/back.conf \
	--volume=./docker/front.conf:/etc/nginx/sites-available/front.conf \
	--name symfony debian12 \
	--extra_hosts = host.docker.internal:host-gateway 
bash:
	docker exec -it -u walter symfony bash 
root:
	docker exec -it symfony bash
start:
	docker start symfony
stop:
	docker stop symfony
rm:
	docker rm symfony
rmi:
	docker image rm debian12
clean: rm rmi
deleteandrebuild: stop clean build run start
launch: build run start
