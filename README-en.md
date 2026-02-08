[中文](./README.md) | English

# Project Introduction

<p align="center">
    <img src="web/public/logo.svg" width="120" alt="logo" />
</p>
<p align="center">
    <a href="https://stableadmin.sephp.com/" target="_blank">Official Website</a> |
    <a href="https://stableadmin.sephp.com/docs" target="_blank">Documentation</a> |
    <a href="https://demo.stableadmin.sephp.com/" target="_blank">Demo</a> |
    <a href="https://hyperf.wiki/3.0/#/" target="_blank">Hyperf Official Docs</a>
</p>

## Project Introduction

StableAdmin is a fork project based on [MineAdmin](https://github.com/mineadmin/MineAdmin). It retains the architecture and basic functionality while simplifying the codebase to make it more stable and efficient.

The backend system is developed based on the Hyperf framework. With an enterprise-level architecture, it easily supports startups and individuals in their early stages, delivering performance comparable to static languages with minimal server resources.

The frontend uses Vue3 + Vite4 + Pinia + Arco, adapting seamlessly to PC, mobile, and tablet devices.

If you find it useful, please give it a ⭐star—it would mean a lot to me and be a great encouragement!

Before using StableAdmin, please carefully read the [Disclaimer](#disclaimer) and agree to its terms.

## Project Features

1. Supports configuration branching based on development environment (dev|test|prod)
2. Removed built-in app marketplace
3. Integrated more stable code generation plugin

## Built-in Features

1. **User Management**: Add, modify, and delete users; supports different homepages for different users
2. **Role Management**: Assign menu permissions and data permissions to roles
3. **Menu Management**: Configure system menus and buttons
4. **Operation Logs**: Track and query user actions
5. **Login Logs**: Record and query user login history
6. **Attachment Management**: Manage uploaded files and images
7. **Department Management**: Manage organizational structure
8. **Position Management**: Manage positions within departments; assign positions to users
9. **Data Permissions**: Data permissions are set by position; can also set data permissions for individual users, overriding position-based permissions

## Requirements

- Swoole >= 6.0 (with `Short Name` disabled)
- PHP >= 8.2 with the following extensions enabled:
  - mbstring
  - json
  - pdo
  - openssl
  - redis
  - pcntl
- [x] MySQL >= 8.0
- [x] PostgreSQL >= 10
- [x] SQL Server (Latest)
- SQLSRV (Latest)
- Redis >= 4.0
- Git >= 2.x

## Download the Project

- StableAdmin does not use SQL file imports for installation. Instead, it uses Migrate files for setup and data seeding.

- To download the project (ensure `Composer` is installed):
```shell
composer create-project lantongxue/stableadmin
```

## Disclaimer

This software is for personal learning purposes only and is not guaranteed for production use.

This software must not be used to develop applications that violate national policies. `StableAdmin` bears no legal responsibility for any misuse.

## Demo Access

[Demo](https://demo.stableadmin.sephp.com)
- Username: **admin**
- Password: **123456**

> Data is automatically restored to its initial state every day at midnight.

## Star History

[![Stargazers over time](https://starchart.cc/lantongxue/StableAdmin.svg)](https://starchart.cc/lantongxue/StableAdmin.svg)

## Contributors

> Thanks to all contributors who helped develop StableAdmin. [[contributors](https://github.com/lantongxue/StableAdmin/graphs/contributors)]
<a href="https://github.com/lantongxue/StableAdmin/graphs/contributors">
<img src="https://contrib.rocks/image?repo=lantongxue/StableAdmin" />
</a>

## Demo Screenshots
[![pAdQKPJ.png](https://s21.ax1x.com/2024/10/22/pAdQKPJ.png)](https://imgse.com/i/pAdQKPJ)
[![pAdQlx1.png](https://s21.ax1x.com/2024/10/22/pAdQlx1.png)](https://imgse.com/i/pAdQlx1)
[![pAdQQ2R.png](https://s21.ax1x.com/2024/10/22/pAdQQ2R.png)](https://imgse.com/i/pAdQQ2R)
[![pAdQGqK.png](https://s21.ax1x.com/2024/10/22/pAdQGqK.png)](https://imgse.com/i/pAdQGqK)
[![pAdQYVO.png](https://s21.ax1x.com/2024/10/22/pAdQYVO.png)](https://imgse.com/i/pAdQYVO)
[![pAdQNIe.png](https://s21.ax1x.com/2024/10/22/pAdQNIe.png)](https://imgse.com/i/pAdQNIe)
[![pAdQaPH.png](https://s21.ax1x.com/2024/10/22/pAdQaPH.png)](https://imgse.com/i/pAdQaPH)
[![pAdQdGd.png](https://s21.ax1x.com/2024/10/22/pAdQdGd.png)](https://imgse.com/i/pAdQdGd)

## Acknowledgments

> Listed in no particular order

[Hyperf - A high-performance enterprise coroutine framework](https://hyperf.io/)

[Element Plus - A Vue 3-based component library for designers and developers](https://element-plus.org/)

[Swoole - PHP coroutine framework](https://www.swoole.com)

[Vue](https://vuejs.org/)

[Vite](https://vitejs.cn/)

[Jetbrains - Productivity tools](https://www.jetbrains.com/)
