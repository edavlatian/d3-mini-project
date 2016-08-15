CREATE TABLE `sales` (
  `branch_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `branch_name` varchar(10) NOT NULL,
  `cur_month` double NOT NULL,
  `last_month` double NOT NULL,
  `month_forcast` double NOT NULL,
  `month_pc` decimal(10,2) NOT NULL,
  `cur_fiscal_year` double NOT NULL,
  `year_forcast` double NOT NULL,
  `last_fiscal_year` double NOT NULL
) COMMENT='Sales Data';


INSERT INTO sales(branch_name, cur_month, last_month, month_forcast, month_pc, cur_fiscal_year, year_forcast, last_fiscal_year) VALUES('Branch 1', 630543.36, 4621577.88, 948333.33, 66.49, 19042395.66, 11380000.00, 11062120.16);
INSERT INTO sales(branch_name, cur_month, last_month, month_forcast, month_pc, cur_fiscal_year, year_forcast, last_fiscal_year) VALUES('Branch 2', 170897.66, 358307.51, 1100458.33, 15.53, 19700932.27, 13205500.00, 14511553.31);
INSERT INTO sales(branch_name, cur_month, last_month, month_forcast, month_pc, cur_fiscal_year, year_forcast, last_fiscal_year) VALUES('Branch 3', 956285.61, 871119.91, 958755.42, 99.74, 14669364.16, 11505065.00, 6435988.35);
INSERT INTO sales(branch_name, cur_month, last_month, month_forcast, month_pc, cur_fiscal_year, year_forcast, last_fiscal_year) VALUES('Branch 4', 281278.25, 762584.05, 550416.67, 51.10, 7629791.43, 6605000.00, 5172993.78);
INSERT INTO sales(branch_name, cur_month, last_month, month_forcast, month_pc, cur_fiscal_year, year_forcast, last_fiscal_year) VALUES('Branch 5', 2009957.41, 1588164.69, 2180416.67, 92.18, 26140276.77, 26165000.00, 25260499.23);
INSERT INTO sales(branch_name, cur_month, last_month, month_forcast, month_pc, cur_fiscal_year, year_forcast, last_fiscal_year) VALUES('Branch 6', 843372.54, 362286.44, 701250.00, 120.27, 7714153.59, 8415000.00, 6250606.71);
INSERT INTO sales(branch_name, cur_month, last_month, month_forcast, month_pc, cur_fiscal_year, year_forcast, last_fiscal_year) VALUES('Branch 7', 208043.95, 594753.86, 1060833.33, 19.61, 10656158.56, 12730000.00, 11384994.21);
INSERT INTO sales(branch_name, cur_month, last_month, month_forcast, month_pc, cur_fiscal_year, year_forcast, last_fiscal_year) VALUES('Branch 8', 256021.01, 380846.77, 1096645.83, 23.35, 10702813.52, 13159750.00, 11606351.86);
INSERT INTO sales(branch_name, cur_month, last_month, month_forcast, month_pc, cur_fiscal_year, year_forcast, last_fiscal_year) VALUES('Branch 9', 983359.85, 1036748.33, 978750.00, 100.47, 9130071.64, 11745000.00, 11598446.59);
