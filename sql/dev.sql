SELECT
i.*,gi.group_name
FROM  ac_items i 
    LEFT JOIN ac_group_items gi ON gi.id = i.group_item_id
WHERE i.group_item_id = 2