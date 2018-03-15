# Orang Tua

[![Join the chat at https://gitter.im/orang-tua/Lobby](https://badges.gitter.im/orang-tua/Lobby.svg)](https://gitter.im/orang-tua/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/orang-tua/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/orang-tua/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/orang-tua/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/orang-tua/build-status/master)
[![Latest Stable Version](https://poser.pugx.org/bantenprov/orang-tua/v/stable)](https://packagist.org/packages/bantenprov/orang-tua)
[![Total Downloads](https://poser.pugx.org/bantenprov/orang-tua/downloads)](https://packagist.org/packages/bantenprov/orang-tua)
[![Latest Unstable Version](https://poser.pugx.org/bantenprov/orang-tua/v/unstable)](https://packagist.org/packages/bantenprov/orang-tua)
[![License](https://poser.pugx.org/bantenprov/orang-tua/license)](https://packagist.org/packages/bantenprov/orang-tua)
[![Monthly Downloads](https://poser.pugx.org/bantenprov/orang-tua/d/monthly)](https://packagist.org/packages/bantenprov/orang-tua)
[![Daily Downloads](https://poser.pugx.org/bantenprov/orang-tua/d/daily)](https://packagist.org/packages/bantenprov/orang-tua)

### Install via composer

- Development snapshot

```bash
$ composer require bantenprov/orang-tua:dev-master
```

- Latest release:

```bash
$ composer require bantenprov/orang-tua
```

### Download via github

```bash
$ git clone https://github.com/bantenprov/orang-tua.git
```

#### Edit `config/app.php` :

```php
'providers' => [

    /*
     * Package Service Providers...
     */
    Laravel\Tinker\TinkerServiceProvider::class,
    //....
    Bantenprov\OrangTua\OrangTuaServiceProvider::class,
```

#### Publish vendor :

```bash
$ php artisan vendor:publish --tag=orang-tua-seeds
$ php artisan vendor:publish --tag=orang-tua-assets
$ php artisan vendor:publish --tag=orang-tua-public
```

#### Lakukan auto dump :

```bash
$ composer dump-autoload
```

#### Lakukan migrate :

```bash
$ php artisan migrate
```

#### Lakukan seeding :

```bash
$ php artisan db:seed --class=BantenprovOrangTuaSeeder
```

#### Tambahkan route di dalam file : `resources/assets/js/routes.js` :

```javascript
{
    path: '/dashboard',
    redirect: '/dashboard/home',
    component: layout('Default'),
    children: [
        //== ...
        {
            path: '/dashboard/orang-tua',
            components: {
                main: resolve => require(['./components/views/bantenprov/orang-tua/DashboardOrangTua.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Orang Tua"
            }
        },
        //== ...
    ]
},
```

```javascript
{
    path: '/admin',
    redirect: '/admin/dashboard/home',
    component: layout('Default'),
    children: [
        //== ...
        {
            path: '/admin/orang-tua',
            components: {
                main: resolve => require(['./components/bantenprov/orang-tua/OrangTua.index.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Orang Tua"
            }
        },
        {
            path: '/admin/orang-tua/create',
            components: {
                main: resolve => require(['./components/bantenprov/orang-tua/OrangTua.add.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Add Orang Tua"
            }
        },
        {
            path: '/admin/orang-tua/:id',
            components: {
                main: resolve => require(['./components/bantenprov/orang-tua/OrangTua.show.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "View Orang Tua"
            }
        },
        {
            path: '/admin/orang-tua/:id/edit',
            components: {
                main: resolve => require(['./components/bantenprov/orang-tua/OrangTua.edit.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Edit Orang Tua"
            }
        },
        //== ...
    ]
},
```
#### Edit menu `resources/assets/js/menu.js`

```javascript
{
    name: 'Dashboard',
    icon: 'fa fa-dashboard',
    childType: 'collapse',
    childItem: [
        //== ...
        {
            name: 'Orang Tua',
            link: '/dashboard/orang-tua',
            icon: 'fa fa-angle-double-right'
        },
        //== ...
    ]
},
```

```javascript
{
    name: 'Admin',
    icon: 'fa fa-lock',
    childType: 'collapse',
    childItem: [
        //== ...
        {
            name: 'Orang Tua',
            link: '/admin/orang-tua',
            icon: 'fa fa-angle-double-right'
        },
        //== ...
    ]
},
```

#### Tambahkan components `resources/assets/js/components.js` :

```javascript
import OrangTua from './components/bantenprov/orang-tua/OrangTua.chart.vue';
Vue.component('echarts-orang-tua', OrangTua);

import OrangTuaKota from './components/bantenprov/orang-tua/OrangTuaKota.chart.vue';
Vue.component('echarts-orang-tua-kota', OrangTuaKota);

import OrangTuaTahun from './components/bantenprov/orang-tua/OrangTuaTahun.chart.vue';
Vue.component('echarts-orang-tua-tahun', OrangTuaTahun);

import OrangTuaAdminShow from './components/bantenprov/orang-tua/OrangTuaAdmin.show.vue';
Vue.component('admin-view-orang-tua-tahun', OrangTuaAdminShow);

//== Echarts Orang Tua

import OrangTuaBar01 from './components/views/bantenprov/orang-tua/OrangTuaBar01.vue';
Vue.component('orang-tua-bar-01', OrangTuaBar01);

import OrangTuaBar02 from './components/views/bantenprov/orang-tua/OrangTuaBar02.vue';
Vue.component('orang-tua-bar-02', OrangTuaBar02);

//== mini bar charts
import OrangTuaBar03 from './components/views/bantenprov/orang-tua/OrangTuaBar03.vue';
Vue.component('orang-tua-bar-03', OrangTuaBar03);

import OrangTuaPie01 from './components/views/bantenprov/orang-tua/OrangTuaPie01.vue';
Vue.component('orang-tua-pie-01', OrangTuaPie01);

import OrangTuaPie02 from './components/views/bantenprov/orang-tua/OrangTuaPie02.vue';
Vue.component('orang-tua-pie-02', OrangTuaPie02);

//== mini pie charts
import OrangTuaPie03 from './components/views/bantenprov/orang-tua/OrangTuaPie03.vue';
Vue.component('orang-tua-pie-03', OrangTuaPie03);
```
