Repositorio para el TP2 de la cátedra Programación Web II.

### Instrucciones:

1. Fork'ear el proyecto en su cuenta github

2. Clonar el proyecto localmente:
    `git clone git`


3. Actualizar las dependencias del proyecto
    `git submodule update --init --recursive`

4. Configurar Apache para acceder al proyecto vía web (ver archivo .conf incluido)osea pegar esto
  
Alias /canchitarwsymfony/sf C:/xampp/htdocs/canchitarwsymfony/lib/vendor/symfony/data/web/sf
<Directory C:/xampp/htdocs/canchitarwsymfony/web/sf>
    AllowOverride All
    Order allow,deny
    Allow from all
</Directory>

Alias /canchitarwsymfony C:/xampp/htdocs/canchitarwsymfony/web
<Directory C:/xampp/htdocs/canchitarwsymfony/web>
    AllowOverride All
    Order allow,deny
    Allow from all
</Directory>
