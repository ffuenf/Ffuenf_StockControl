-- add table prefix if you have one
DELETE FROM core_config_data WHERE path like 'stockcontrol/%';
DELETE FROM core_resource WHERE code = 'stockcontrol_setup';