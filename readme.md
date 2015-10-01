＃ 开发工程初始化
1. 创建并进入工作目录
```sh
cd wording dir
```

2. 源代码下载
```sh
git clone
```
可以使用sourcetree等工具

3. 环境配置文件设置
```sh
cp .env.example .env
vim .env
//根据本地需求配置文件
```

4.数据库设置
创建数据库，然后将数据库名称，用户名，密码等写入.env文件

4.composer 插件安装
[composer 安装方法](https://github.com/composer/composer)
安装完毕后
```sh
composer install
// 如果出错了，打开文件wording_dir/config/app.php，
// 注释掉‘Maatwebsite\Excel\ExcelServiceProvider::class’和‘'Excel'     => Maatwebsite\Excel\Facades\Excel::class,’
// 打开wording_dir/config/excel.php
// 注释掉‘'autosize-method'             => PHPExcel_Shared_Font::AUTOSIZE_METHOD_APPROX,’
// 然后再次执行'composer install'
// 成功后去掉之前添加的注释
```
5. laravel 加密key生成
```sh
php artisan key:generate
```

6.数据库内容更新
```sh
php artisan migrate
// 数据表生成

php artisan db:seed
// 测试数据添加
```


＃ 开发规则
1. 代码规范
要求符合psr-2规范(http://www.php-fig.org/psr/psr-2/)，尽量满足psr-4规范(http://www.php-fig.org/psr/psr-4/)

2. 命名规范
 1. 类名: PascalCase
 2. 变量名: camelCase
 3. 函数名: camelCase
 4. 常数: UPPER_CASE

3. 代码测试
 利用phpunit进行代码测试，在提交代码之前，应进行代码测试，无错误后方可提交


# git管理规则
1. git分支管理
 1. 开发时分支: feature-**-**(**为开发功能模块英文名称)
 2. 数据库修改: db-**-**(**为修改内容)
 3. bug修复时分支: bug-**-**

2. git 提交规范
 1. 开发时应在自己分支上进行开发，在进行开发之前，将主分支(development)合并到自己分支（为了保证为最新代码，减少冲突）
 2. 开发完成后，进行代码规范检查
  ```sh
  phpcs --standard=psr2 --colors testfile
  // 如果可以的话进行psr4测试
  // phpcs --standard=psr4 --colors testfile
  ```
 3. phpunit测试
 在完成功能代码后，需对自己所写代码撰写测试代码，进行测试。要求有详细的测试记录
 ```sh
 phpunit    // 对所有测试文件进行测试
 phpunit filename   // 对单个文件进行测试
 ｀｀｀
 4. git提交
 在完成阶段性工作或者全部工作后，并且测试和代码规范都正确后可以提交到代码库的自己分支中，提交git管理库有利于错误时回滚，所以在完成一定代码量后即可提交。
 在提交后可以从远程代码库fetch，如果主分支(development)有了更新，及时pull到本地，并且合并到自己的分支，这样可以减少代码冲突

 5. 分支合并请求
  1. 如果合并后，发现有代码冲突，在自己本地将代码冲突修改（一定要再三确认修改正确性，合并到主分支会影响到整个代码库)，然后提交自己的分支
  2. 进入[gitlab](https://gitlab.com/yoursave/yoursave/merge_requests/new),创建合并请求，选择代码检查人进行代码查看
  3. 作为代码检查人检查时，应确定代码内容，提出个人意见，有问题及时回复开发者，没有问题后添加确认评论，然后进行分支合并，将新开发代码加入主分支(development)中
  4. 合并后若改分支的开发内容完毕，可对该分支进行删除。


＃ laravel 多语言对应
1. 所以涉及到多语言问题(界面显示，邮件信息等)都在/resources/lang文件夹下定义
然后利用laravel函数
｀｀｀php
trans('views.page_name.category_name.info_name');  // 界面控键名文件
trans('messages.page_name.category_name.info_name');  // 界面信息提示文件
trans('database.table_name.table_cell_name.value');  // 数据库信息文件
```
