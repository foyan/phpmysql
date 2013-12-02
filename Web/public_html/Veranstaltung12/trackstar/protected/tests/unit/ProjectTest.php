<?php

class ProjectTest extends CDbTestCase {
    
    public function testCRUD() {
        
        $proj = new Project();
        $proj->setAttributes(array(
            'name' => 'test_name',
            'description' => 'test_description',
            'create_time' => '2013-01-01 00:00:00',
            'create_user_id' => 1,
            'update_time' => '2013-01-01 00:00:00',
            'update_user_id' => 1
        ));
        $this->assertTrue($proj->save(false));
        
        $other = Project::model()->findByPk($proj->id);
        $this->assertTrue($other instanceof Project);
        $this->assertEquals('test_name', $other->name);
        
        $proj->name = 'test_name_upd';
        $this->assertTrue($proj->save(false));
        
        $other = Project::model()->findByPk($proj->id);
        $this->assertTrue($other instanceof Project);
        $this->assertEquals('test_name_upd', $other->name);
        
        $id = $proj->id;
        $this->assertTrue($proj->delete());
        $void = Project::model()->findByPk($id);
        $this->assertEquals(NULL, $void);
        
    }
    
}


?>
