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
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
	<?= $this->Html->css('chosen.css') ?>   

    <?= $this->Html->script('https://code.jquery.com/jquery-1.12.4.min.js') ?>
    <?= $this->Html->script('chosen.jquery') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script');?> 

  
</head>
<body>
  
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
		<?php if (!empty($theName)){?>
        <nav class="top-bar expanded" data-topbar role="navigation">
            <div class="top-bar-section">
                <ul class="right">
                    <?php if (!empty($theName)){?>
                    <li><?php echo $this->Html->link(
                    'Welcome '.$theName,
                    '/admin',
                    ['class' => '']
                    );?></li>
                    <?php }?>
                    
                         
                </ul>
            </div>
        </nav>
        <?php }?>    
        <?= $this->fetch('content') ?>
    </div>

 
</body>
</html>
