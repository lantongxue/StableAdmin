中文 | [English](./README-en.md)
# 项目介绍

<p align="center">
    <img src="web/public/logo.svg" width="120" alt="logo" />
</p>
<p align="center">
    <a href="https://stableadmin.sephp.com/" target="_blank">官网</a> |
    <a href="https://stableadmin.sephp.com/docs" target="_blank">文档</a> | 
    <a href="https://demo.stableadmin.sephp.com/" target="_blank">演示</a> |
    <a href="https://hyperf.wiki/3.0/#/" target="_blank">Hyperf官方文档</a> 
</p>

## 项目介绍

StableAdmin 是基于[MineAdmin](https://github.com/mineadmin/MineAdmin)的分支项目，在保持架构和基本功能不变的情况下做了减法，使其更加稳定、高效。

后台系统基于 Hyperf 框架开发。企业级架构分层，轻松支撑创业公司及个人前期发展使用，使用少量的服务器资源媲美静态语言的性能。
前端使用Vue3 + Vite4 + Pinia + Arco，一端适配PC、移动端、平板

如果觉着还不错的话，就请点个 ⭐star 支持一下吧，这将是对我最大的支持和鼓励！
在使用 StableAdmin 前请认真阅读[《免责声明》](#免责声明)并同意该声明。

## 本项目特点
1. 支持基于开发环境(dev|test|prod)的配置分流
2. 移除内置应用商店
3. 集成更稳定的代码生成插件

## 内置功能

1. 用户管理，完成用户添加、修改、删除配置，支持不同用户登录后台看到不同的首页
2. 角色管理，角色菜单权限分配、角色数据权限分配
3. 菜单管理，配置系统菜单和按钮等
4. 操作日志，用户对系统的一些正常操作的查询
5. 登录日志，用户登录系统的记录查询
6. 附件管理，管理当前系统上传的文件及图片等信息
7. 部门管理，可以管理组织架构
8. 岗位管理，在部门内管理，可以为部门设置岗位，再为用户分配岗位
9. 数据权限，数据权限功能跟随岗位而设置，同时，也可以对用户单独设置数据权限，使岗位的数据权限失效。

## 环境需求

- Swoole >= 6.0 并关闭 `Short Name`
- PHP >= 8.2 并开启以下扩展：
  - mbstring
  - json
  - pdo
  - openssl
  - redis
  - pcntl
- [x] Mysql >= 8.0
- [x] Pgsql >= 10
- [x] Sql Server Latest
- Sqlsrv is Latest
- Redis >= 4.0
- Git >= 2.x


## 下载项目
- StableAdmin 没有使用SQL文件导入安装，系统使用Migrates迁移文件形式安装和填充数据，请知悉。

- 项目下载，请确保已经安装了 `Composer`
```shell
composer create-project lantongxue/mineadmin --keep-vcs
```

## 免责声明
本软件仅供个人学习使用，不保证生产可用

使用本软件不得用于开发违反国家有关政策的相关软件和应用，若因使用本软件造成的一切法律责任均与 `StableAdmin` 无关

## 体验地址

[体验地址](https://demo.stableadmin.sephp.com)
- 账号：admin
- 密码：123456

> 数据每天凌晨自动恢复初始状态

## star 趋势

[![Stargazers over time](hhttps://starchart.cc/lantongxue/StableAdmin.svg)](https://starchart.cc/lantongxue/StableAdmin.svg)

## 贡献者

> 感谢所有参与 StableAdmin 开发的代码贡献者。 [[contributors](https://github.com/lantongxue/StableAdmin/graphs/contributors)]
<a href="https://github.com/lantongxue/StableAdmin/graphs/contributors">
<img src="https://contrib.rocks/image?repo=lantongxue/StableAdmin" />
</a>

## 演示图片
[![pAdQKPJ.png](https://s21.ax1x.com/2024/10/22/pAdQKPJ.png)](https://imgse.com/i/pAdQKPJ)
[![pAdQlx1.png](https://s21.ax1x.com/2024/10/22/pAdQlx1.png)](https://imgse.com/i/pAdQlx1)
[![pAdQQ2R.png](https://s21.ax1x.com/2024/10/22/pAdQQ2R.png)](https://imgse.com/i/pAdQQ2R)
[![pAdQGqK.png](https://s21.ax1x.com/2024/10/22/pAdQGqK.png)](https://imgse.com/i/pAdQGqK)
[![pAdQYVO.png](https://s21.ax1x.com/2024/10/22/pAdQYVO.png)](https://imgse.com/i/pAdQYVO)
[![pAdQNIe.png](https://s21.ax1x.com/2024/10/22/pAdQNIe.png)](https://imgse.com/i/pAdQNIe)
[![pAdQaPH.png](https://s21.ax1x.com/2024/10/22/pAdQaPH.png)](https://imgse.com/i/pAdQaPH)
[![pAdQdGd.png](https://s21.ax1x.com/2024/10/22/pAdQdGd.png)](https://imgse.com/i/pAdQdGd)

## 鸣谢

> 以下排名不分先后

[Hyperf 一款高性能企业级协程框架](https://hyperf.io/)

[Element Plus 基于 Vue 3，面向设计师和开发者的组件库](https://element-plus.org/)

[Swoole PHP协程框架](https://www.swoole.com)

[Vue](https://vuejs.org/)

[Vite](https://vitejs.cn/)

[Jetbrains 生产力工具](https://www.jetbrains.com/)
