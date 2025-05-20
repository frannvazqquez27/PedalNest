<?php
use PHPUnit\Framework\TestCase;

global $mockPDOForTest;
$mockPDOForTest = null;
function getDB() {
    global $mockPDOForTest;
    return $mockPDOForTest;
}

require_once __DIR__ . '/../clases/comentario.php';

class ComentarioTest extends TestCase
{
    public function testBorrarComentarioEjecutaDelete()
    {
        global $mockPDOForTest;
        $comentario = new Comentario();

        $mockPDO = $this->createMock(PDO::class);
        $mockStatement = $this->createMock(PDOStatement::class);

        $mockPDO->expects($this->once())
            ->method('prepare')
            ->with($this->stringContains('DELETE FROM Resenas'))
            ->willReturn($mockStatement);

        $mockStatement->expects($this->any())
            ->method('bindParam')
            ->withAnyParameters();

        $mockStatement->expects($this->once())
            ->method('execute')
            ->willReturn(true);

        $mockPDOForTest = $mockPDO;

        $this->assertTrue($comentario->borrarComentario(1, 'usuario@ejemplo.com'));
    }

    public function testAnadirCometarioEjecutaInsert()
    {
        global $mockPDOForTest;
        $comentario = new Comentario();

        $mockPDO = $this->createMock(PDO::class);
        $mockStatement = $this->createMock(PDOStatement::class);

        $mockPDO->expects($this->once())
            ->method('prepare')
            ->with($this->stringContains('INSERT INTO Resenas'))
            ->willReturn($mockStatement);

        $mockStatement->expects($this->any())
            ->method('bindParam')
            ->withAnyParameters();

        $mockStatement->expects($this->once())
            ->method('execute')
            ->willReturn(true);

        $mockPDOForTest = $mockPDO;

        $this->assertTrue($comentario->anadirCometario('Nombre', 'correo@ejemplo.com', 'Texto de prueba'));
    }

    public function testObtenerComentariosDevuelveArray()
    {
        global $mockPDOForTest;
        $comentario = new Comentario();

        $mockPDO = $this->createMock(PDO::class);
        $mockStatement = $this->createMock(PDOStatement::class);

        $mockPDO->expects($this->once())
            ->method('prepare')
            ->with($this->stringContains('SELECT Nombre as nombre'))
            ->willReturn($mockStatement);

        $mockStatement->expects($this->once())
            ->method('execute')
            ->willReturn(true);

        $mockStatement->expects($this->once())
            ->method('fetchAll')
            ->with(PDO::FETCH_CLASS)
            ->willReturn([
                (object)['nombre' => 'Ana', 'correo' => 'ana@ejemplo.com', 'texto' => 'Hola'],
                (object)['nombre' => 'Luis', 'correo' => 'luis@ejemplo.com', 'texto' => 'Buenas']
            ]);

        $mockPDOForTest = $mockPDO;

        $result = $comentario->obtenerComentarios();
        $this->assertIsArray($result);
        $this->assertCount(2, $result);
        $this->assertEquals('Ana', $result[0]->nombre);
    }
}