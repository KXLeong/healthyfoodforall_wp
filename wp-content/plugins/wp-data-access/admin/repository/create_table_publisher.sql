CREATE TABLE {wp_prefix}wpda_publisher{wpda_postfix} (
  pub_id                          mediumint(9)          NOT NULL AUTO_INCREMENT,
  pub_name                        varchar(100)          NOT NULL,
  pub_schema_name                 varchar(64)           NOT NULL  DEFAULT '',
  pub_data_source                 enum('Table','Query', 'CPT') 
                                                                  DEFAULT 'Table',
  pub_table_name                  varchar(64)           NOT NULL,
  pub_column_names                varchar(4096)                   DEFAULT '*',
  pub_format                      text,
  pub_query                       text,
  pub_sort_icons                  enum('default','plugin','none'),
  pub_styles                      set('default', 'stripe', 'hover', 'order-column', 'row-border', 'compact', 'cell-border')
                                                                  DEFAULT 'default',
  pub_style_premium               enum('Yes', 'No')               DEFAULT 'No',
  pub_style_color                 varchar(50)                     DEFAULT 'default',
  pub_style_space                 tinyint(2) unsigned             DEFAULT 10,
  pub_style_corner                tinyint(2) unsigned             DEFAULT 0,
  pub_style_modal_width           tinyint(2) unsigned             DEFAULT 80,
  pub_responsive                  enum('Yes', 'No'),
  pub_responsive_popup_title      varchar(50),
  pub_responsive_cols             int unsigned                    DEFAULT 0,
  pub_responsive_type             enum('Modal', 'Collapsed', 'Expanded'),
  pub_responsive_modal_hyperlinks enum('If not listed', 'Never', 'Always'),
  pub_responsive_icon             enum('Yes', 'No'),
  pub_show_advanced_settings      tinyint(1)                      DEFAULT NULL,
  pub_default_where               varchar(2000)                   DEFAULT '',
  pub_default_orderby             varchar(100)                    DEFAULT '',
  pub_table_options_searching     char(3)                         DEFAULT 'on',
  pub_table_options_ordering      char(3)                         DEFAULT 'on',
  pub_table_options_paging        char(3)                         DEFAULT 'on',
  pub_table_options_serverside    char(3)                         DEFAULT 'on',
  pub_table_options_nl2br         char(3)                         DEFAULT NULL,
  pub_table_options_advanced      text,
  pub_extentions                  varchar(255)                    DEFAULT '',
  PRIMARY KEY (pub_id),
  UNIQUE KEY (pub_name)
);