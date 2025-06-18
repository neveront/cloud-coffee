<!-- category_dropdown.php -->
<select name="category" id="category">
   <option value="">select catagory</option>
   <option value="Coffee"<?php if(isset($selected_category) && $selected_category == 'Coffee') echo ' selected'; ?>>Coffee</option>
   <option value="Tea"<?php if(isset($selected_category) && $selected_category == 'Tea') echo ' selected'; ?>>Tea</option>
   <option value="Fruit Tea"<?php if(isset($selected_category) && $selected_category == 'Fruit Tea') echo ' selected'; ?>>Fruit Tea</option>
   <option value="Americano"<?php if(isset($selected_category) && $selected_category == 'Americano') echo ' selected'; ?>>Americano</option>
   <option value="Cappuccino"<?php if(isset($selected_category) && $selected_category == 'Cappuccino') echo ' selected'; ?>>Cappuccino</option>
   <option value="Latte"<?php if(isset($selected_category) && $selected_category == 'Latte') echo ' selected'; ?>>Latte</option>
   <option value="Mocha"<?php if(isset($selected_category) && $selected_category == 'Mocha') echo ' selected'; ?>>Mocha</option>
   <option value="Espresso"<?php if(isset($selected_category) && $selected_category == 'Espresso') echo ' selected'; ?>>Espresso</option>
   <option value="Frappe"<?php if(isset($selected_category) && $selected_category == 'Frappe') echo ' selected'; ?>>Frappe</option>
   <option value="Iced Coffee"<?php if(isset($selected_category) && $selected_category == 'Iced Coffee') echo ' selected'; ?>>Iced Coffee</option>
   <option value="Meals"<?php if(isset($selected_category) && $selected_category == 'Meals') echo ' selected'; ?>>Meals</option>
</select>