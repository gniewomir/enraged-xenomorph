FROM php:8.1-cli
RUN apt-get update -y && apt-get install -y \
    git \
    libzip-dev \
    unzip \
    libicu-dev \
    libpq-dev \
    graphviz
RUN pecl install xdebug
RUN docker-php-ext-install zip \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && docker-php-ext-install opcache \
    && docker-php-ext-install pdo \
    && docker-php-ext-install pdo_pgsql \
    && docker-php-ext-install pgsql \
    && docker-php-ext-enable xdebug
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony

WORKDIR /app
ADD ./*.json /app/
ADD ./*.lock /app/
RUN composer install --no-scripts --optimize-autoloader --dev --no-progress

ADD . /app

CMD symfony server:start --port=3160
