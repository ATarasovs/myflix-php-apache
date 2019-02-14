echo stoping services
docker stop php-apache
docker rm php-apache
docker rmi php-apache

docker build -t php-apache .
docker run -it -d -p 8000:80 --name php-apache -v $(pwd)/www:/var/www/html php-apache


