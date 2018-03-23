1) run 'composer install' after install go to config dir and rename "parameters.yml.dist" to "parameters.yml" check params an go to next step. 
2) run './console  doctrine:database:create'
3) run './console doctrine:schema:update --force'
4) run './console demo:import_logs_data'
5) open site in browser
6) Example https://www.screencast.com/t/gCPc1TOYM8s