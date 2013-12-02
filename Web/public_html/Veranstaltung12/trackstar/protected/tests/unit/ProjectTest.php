<?php

class ProjectTest extends CDbTestCase {
    
    public $fixtures = array (
        'projects' => 'Project'
    );
    
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
    
public function testCreate()
{
//CREATE a new Project
$newProject=new Project;
$newProjectName = 'Test Project Creation';
$newProject->setAttributes(array(
'name' => $newProjectName,
'description' => 'This is a test for new project creation',
'createTime' => '2009-09-09 00:00:00',
'createUser' => '1',
'updateTime' => '2009-09-09 00:00:00',
'updateUser' => '1',
)
);
$this->assertTrue($newProject->save(false));
$retrievedProject=Project::model()->findByPk($newProject->id);
$this->assertTrue($retrievedProject instanceof Project);
$this->assertEquals($newProjectName,$retrievedProject->name);
}
public function testRead()
{
$retrievedProject = $this->projects('project1');
$this->assertTrue($retrievedProject instanceof Project);
$this->assertEquals('Test Project 1',$retrievedProject->name);
}
public function testUpdate()
{
$project = $this->projects('project2');
$updatedProjectName = 'Updated Test Project 2';
$project->name = $updatedProjectName;
$this->assertTrue($project->save(false));
//read back the record again to ensure the update worked
$updatedProject=Project::model()->findByPk($project->id);
$this->assertTrue($updatedProject instanceof Project);
$this->assertEquals($updatedProjectName,$updatedProject->name);
}
public function testDelete()
{
$project = $this->projects('project2');
$savedProjectId = $project->id;
$this->assertTrue($project->delete());
$deletedProject=Project::model()->findByPk($savedProjectId);
$this->assertEquals(NULL,$deletedProject);
}
    
}


?>
