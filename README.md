# NoteVerse

El objetivo del proyecto consiste en proporcionar a  la gente una lista de tareas que sea comoda de utilizar se pueda utilizar a diario
en la pagina podras iniciar sesion crear  o eliminar tu cuenta y crear modificar o eliminar tus notas las cuales solo podras mirar tu ya que las notas van vinculadas a la cuenta.

## Documentacion


## Puesta en marcha

Para poner en marcha el proyecto se debe hacer lo siguiente

### Clonación del repositorio
Descarga el contenido del repositorio con todo el código fuente mediante:
```
git clone https://github.com/red153/Practica-Proyecto-final.git
```

### Instalación de dependencias node
Una vez tengamos todos los archivos tendremos que hacer un:

```
npm install
```
### Instalación de dependencias PHP
*Habrá que hacer algún composer install*
???

para poder instalar las dependencias necesarias del proyecto y un:

### Base de datos
*Falta explicar como se crea y explica que tipo es, nombre etc.*

```
php artisan migrate
```

Una vez hagas esto tambien deberas ejecutar un 
```
docker compose up
```
para crear la bd 

*Esto creo que debería ser anterior ¿Estás seguro que si se siguen estos pasos funciona?*
a continuacion en el .env.example borra el .example  deja el nombre del fichero como .env

Entonces ya estará instalado todo y lo que se debera hacer con dos terminales en una:
```
npm run dev
```
y en la otra:
```
php artisan serve
```
en la propia terminal donde ejecutes el php artisan serve saldra la dirección a la página
