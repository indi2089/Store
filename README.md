
# Curso Plataformas Abiertas

## Descripción
Una API de una tienda de ropa implementada con bases de datos en SQL y en PHP.

## Diagrama de la estructura de datos
marcas: Contendrá las marcas disponibles.
prendas: Listará las prendas, con referencias a las marcas.
ventas: Registrará las ventas realizadas.

![alt text](./otros/imagenes/diagrama.png "Diagrama")

## Integrantes

Indira Picado Picado

## Uso de Endpoints de la API



1. Endpoints para obtener todas las marcas:
   - Método: GET
   - Endpoint: http://localhost/proyecto-tienda/scripts/public/index.php/marcas
   - Descripción: Obtiene una lista de todas las marcas disponibles en el sistema.

   ```http
   GET http://localhost/proyecto-tienda/scripts/public/index.php/marcas
   ```

   Ejemplo de respuesta:
   ```json
   [
      {
        "id": "1",
        "nombre": "Camisa Casual"
    },
    {
        "id": "2",
        "nombre": "Camisa Casual"
    },
    {
        "id": "3",
        "nombre": "Adiddas"
    },
    {
        "id": "4",
        "nombre": "blusa"
    },
    {
        "id": "5",
        "nombre": "medias"
    },
    {
        "id": "6",
        "nombre": "puma"
    },
    {
        "id": "7",
        "nombre": "pantalon"
    }
   ]
   ```

2. Endpoint para obtener un Marca por ID:
   - Método: GET
   - Endpoint: `http://localhost/proyecto-tienda/scripts/public/index.php/marcas{id-del-marcas}`
   - Descripción: Obtiene la información de una Marcaespecífica usando su ID.

   ```http
   GET  `http://localhost/proyecto-tienda/scripts/public/index.php/marcas{id-del-marcas}` 
   ```

   Ejemplo de uso:
   ```http
   GET  `http://localhost/proyecto-tienda/scripts/public/index.php/marcas/1 
   ```

   Ejemplo de respuesta:
   ```json
  [
    {
        "id": "1",
        "nombre": "Camisa Casual"
    },
       ```

3. Endpoint para crear una marca:
   - Método: POST
   - Endpoint: http://localhost/proyecto-tienda/scripts/public/index.php/marcas
   - Descripción: Inserta un nueva marca en la base de datos.

   ```http
   POST http://localhost/proyecto-tienda/scripts/public/index.php/marcas
   ```

   Cuerpo de la petición (JSON):
   ```json
   {
  "nombre": "ROXY"
   }
   ```

   Ejemplo de respuesta:
   ```json
  {
    "success": true
  }
   ```

4. Endpoint para actualizar una marca por ID:
   - Método: PUT
   - Endpoint:  `http://localhost/proyecto-tienda/scripts/public/index.php/marcas/1{id-del-maraca}`
   - Descripción: Actualiza la información de una marca específica.

   ```http
   PUT http://localhost/proyecto-tienda/scripts/public/index.php/marcas/1
   ```

   Cuerpo de la petición (JSON):
   ```json
   {

    "nombre": "zara"
}
   ```

   Ejemplo de respuesta:
   ```json
   {
    "success": true
}
   ```

5. Endpoint para eliminar un libro por ID:
   - Método: DELETE
   - Endpoint: `http://localhost/proyecto-tienda/scripts/public/index.php/marcas/1{id-del-libro}`
   - Descripción: Elimina un marca específica de la base de datos.

   ```http
   DELETE http://localhost/proyecto-tienda/scripts/public/index.php/marcas/1
   ```

   Ejemplo de respuesta:
   ```json
   {
    "success": false,
    "message": "ID no especificado."
}{
    "success": null
}
   ```