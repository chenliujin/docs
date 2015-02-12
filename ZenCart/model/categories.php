<?php
class categories
{
	static public function getTableName()
	{
		return 'categories';
	}
	
	static public function getAll($language_id)
	{		
		$sql = "
			SELECT 
				c.categories_id,
				c.products_quantity, 
				c.parent_id,
				c.categories_status,
				c.level,
				c.google_promotion_code,
				c.stand_out, 
				c.country_restrict,
				cd.language_id,
				cd.categories_description,
				cd.categories_name,
			FROM " . SELF::GetTableName() . " c
			LEFT JOIN " . categories_description::GetTableName() . " cd ON c.categories_id = cd.categories_id
			WHERE cd.language_id=" . (int)$language_id . "
			ORDER BY c.parent_id, c.sort_order, cd.categories_name";
	}
}