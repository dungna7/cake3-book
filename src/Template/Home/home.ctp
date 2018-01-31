<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace src/Template/Pages/home.ctp with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<html lang="en">

<head>
    <title>detail</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/style/detail.css">
    <script src="/javascript/list.js"></script>
</head>

<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-sm navbar-light bg-primary py-0 pr-0">
            <div class="col-lg-9 row pr-0">
                <button class="navbar-toggler my-auto" type="button" onclick="openNav()" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">Disabled</a>
                            </li>
                        </ul>
                </div>
                <div class="collapse navbar-collapse" id="">
                    <a class="navbar-brand text-white" href="#"></a>
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <?php foreach ($memu as $item): ?>
                    <?php if (isset($item['subCategory'])): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white dropdown-toggle"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"><?= $item['name']?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach ($item['subCategory'] as $subItem): ?>
                                <a class="dropdown-item" href="/<?= $item['alias']?>/<?= $subItem['alias']?>"><?= $subItem['name']?></a>
                            <?php endforeach; ?>
                            </div>
                        </li>
                    <?php else: ?>    
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/<?= $item['alias']?>"><?= $item['name']?></a>
                    </li>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    </ul>
                </div>
                <div class="my-2 my-lg-0 ml-auto">
                    <ul class="nav justify-content-end">
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="#">
                                <i class="fas fa-bell "></i>
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fas fa-cogs"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fas fa-user"></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container-fluid body py-2">
        <div class="main row">
            <div class="col-lg-2 col-sm-12 br-1">
                <div class="aside mini-logo">
                    <aside class="sidebar">
                        <div class="">
                            <img src="images/minano1.jpg" alt="CakePHP Tutorial" draggable="true" data-bukket-ext-bukket-draggable="true">
                        </div>
                        <ul class="nav nav-list primary left-menu" id="sidebar">
                            <li>
                                <a href="/minano1/1">CakePHP - Home</a>
                            </li>
                            <li>
                                <a href="/minano1/2">CakePHP - Overview</a>
                            </li>
                            <li>
                                <a href="/minano1/3">CakePHP - Installation</a>
                            </li>
                            <li>
                                <a href="/minano1/4">CakePHP - Folder Structure</a>
                            </li>
                            <li>
                                <a href="/minano1/5">CakePHP - Configuration</a>
                            </li>
                            <li>
                                <a href="/minano1/6">CakePHP - Email Configuration</a>
                            </li>
                            <li>
                                <a href="/minano1/7">CakePHP - Routing</a>
                            </li>
                            <li>
                                <a href="/minano1/8">CakePHP - Generating Urls</a>
                            </li>
                            <li>
                                <a href="/minano1/9">CakePHP - Redirect Routing</a>
                            </li>
                            <li>
                                <a href="/minano1/10">CakePHP - Controllers</a>
                            </li>
                            <li>
                                <a href="/minano1/11">CakePHP - Views</a>
                            </li>
                            <li>
                                <a href="/minano1/12">CakePHP - Extending Views</a>
                            </li>

                            <li>
                                <a target="_top" href="/developers_best_practices/index.htm">Developer's Best Practices</a>
                            </li>
                            <li>
                                <a target="_top" href="/questions_and_answers.htm">Questions and Answers</a>
                            </li>
                            <li>
                                <a target="_top" href="/effective_resume_writing.htm">Effective Resume Writing</a>
                            </li>
                            <li>
                                <a target="_top" href="/hr_interview_questions/index.htm">HR Interview Questions</a>
                            </li>
                            <li>
                                <a target="_top" href="/computer_glossary.htm">Computer Glossary</a>
                            </li>
                            <li>
                                <a target="_top" href="/computer_whoiswho.htm">Who is Who</a>
                            </li>
                        </ul>
                    </aside>
                </div>
            </div>
            <div class="col-lg-7 col-sm-12 content px-0">
                <div class="container-fluid advertisements"></div>
                
                <div class="container-fluid">
                 <h5 class="card-header row">Featured</h5>
                    <div class="row">
                        <div class="card col-5">
                            <div class="card-body mb-0 p-0">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">With suppot.</p>
                                <a href="#" class="btn btn-primary">Button</a>
                            </div>
                        </div>
                        <div class="list-group col-7 pr-0">
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                                <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">List group item heading</h5>
                                <small>3 days ago</small>
                                </div>
                                <p class="mb-1">Donec id elit non mi porta m eget risus varius blandit.</p>
                                <small>Donec id elit non mi porta.</small>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">List group item heading</h5>
                                <small class="text-muted">3 days ago</small>
                                </div>
                                <p class="mb-1">gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                <small class="text-muted">Donec id elit non mi porta.</small>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">List group item heading</h5>
                                <small class="text-muted">3 days ago</small>
                                </div>
                                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                <small class="text-muted">Donec id elit non mi porta.</small>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">List group item heading</h5>
                                <small class="text-muted">3 days ago</small>
                                </div>
                                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                <small class="text-muted">Donec id elit non mi porta.</small>
                            </a>
                        </div>
                    </div>    
                </div>
               
                <div class="container-fluid advertisements"></div>
            </div>
            <div class="col-lg-3 col-sm-12 "></div>
        </div>
    </div>
    <footer class="container-fluid">
        <div class="footer col-lg-9 row">
            <div class="col-2 h-100 d-inline-block">
                <a href="index.htm" class="logo">
                    <img alt="Tutorials Point" class="mh-100 img-responsive" src="images/logo-footer.png" draggable="true" data-bukket-ext-bukket-draggable="true"> </a>
            </div>
            <div class="col-10">
                <div class="w-100 h-50">
                    <ul class="nav justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Active</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>
                </div>
                <div class="w-100 h-50 copyright">
                    <p class="text-center">© Copyright 2017. All Rights Reserved.</p>
                </div>
            </div>
        </div>
        </div>
    </footer>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>