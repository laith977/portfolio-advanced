<?php

use yii\db\Migration;

class m260117_233208_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $manageTestimonials = $auth->createPermission('manageTestimonials');
        $manageTestimonials->description = 'Manage all testimonials (full access)';
        $auth->add($manageTestimonials);

        $manageProject = $auth->createPermission('manageProjects');
        $manageProject->description = 'Manage all projects (full access)';
        $auth->add($manageProject);

        $manageBlog = $auth->createPermission('manageBlogs');
        $manageBlog->description = 'Manage blog (full access)';
        $auth->add($manageBlog);

        $viewProject = $auth->createPermission('viewProject');
        $viewProject->description = 'Project actionView';
        $auth->add($viewProject);

        $testimonialManager = $auth->createRole('testimonialManager');
        $auth->add($testimonialManager);

        $auth->addChild($testimonialManager, $manageTestimonials);
        $auth->addChild($testimonialManager, $viewProject);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $testimonialManager);
        $auth->addChild($admin, $manageProject);
        $auth->addChild($admin, $manageBlog);

        $auth->assign($admin, 1);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();
    }
}
