部署方法
========

## 依赖

* PHP >=5.6
* [Node.js](https://nodejs.org/) >= 4.x
* [bower](https://bower.io/)
* [Ruby](https://ruby-lang.org/) >= 2.2
* [Compass](https://compass-style.org/) >= 1.0
* Git

## 初次部署

1. 进入 WordPress 的主题目录，clone 代码到本地
    ```bash
    cd /path/to/wordpress/wp-content/themes/
    git clone git@github.com:Dianjoy/site2014.git dian2013
    ```
2. 进入目录
    ```bash
    cd dian2013
    ```
2. 安装依赖
    ```bash
    bower install
    ```
3. 编译 css
    ```bash
    compass compile --no-sourcemap --output-style compressed
    ```
7. 完成！

## 更新

1. 更新代码
    ```bash
    git pull
    ```
2. 更新依赖
    ```bash
    bower install
    ```
3. 编译 css
    ```bash
    compass compile --no-sourcemap --output-style compressed
    ```
4. 完成