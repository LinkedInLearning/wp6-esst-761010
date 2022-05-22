up:
	docker-compose up -d

stop:
	docker-compose stop

cli:
	docker run -it --rm \
    --volumes-from wordpress6 \
    --network container:wordpress6 \
    -e WORDPRESS_DB_USER=wordpress \
    -e WORDPRESS_DB_PASSWORD=wordpress \
    wordpress:cli bash
