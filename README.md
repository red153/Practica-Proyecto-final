# Practica-Proyecto-final

# Titulo: NoteVerse

El objetivo del proyecto consiste en proporcionar a  la gente una lista de tareas que sea comoda de utilizar se pueda utilizar a diario
en la pagina podras iniciar sesion crear  o eliminar tu cuenta y crear modificar o eliminar tus notas las cuales solo podras mirar tu ya que las notas van vinculadas a la cuenta
estoy añadiendo mas funcionalidades

# Documentacion


# Instalacion

Para instalar el proyecto se debe hacer lo siguiente 

primero haremos un git clone https://github.com/red153/Practica-Proyecto-final.git

Una vez tengamos todos los archivos tendremos que hacer un:
npm install

para poder instalar las dependencias necesarias del proyecto
y un:
php artisan migrate

Una vez hagas esto tambien deberas ejecutar

un docker compose up

para crear la bd 

a continuacion en el .env.example borra el .example  deja el nombre del fichero como .env

Entonces ya estara instalado todo y lo que se debera hacer 

con dos terminales en una:

npm run dev

y en la otra:

php artisan serve

en la propia terminal donde ejecutes el php artisan serve saldra la direccion a la pagina
