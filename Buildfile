echo stoping services
sudo docker stop php-apache
sudo docker rm php-apache
sudo docker rmi php-apache

sudo docker build -t php-apache .
sudo docker run -it -d -p 8000:80 --name php-apache -v $(pwd)/www:/var/www/html php-apache


