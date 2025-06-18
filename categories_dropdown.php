<form method="GET" action="" class="filter-form">
         <select name="category" onchange="this.form.submit()">
            <option value="">All Products</option>
            <option value="Coffee"<?php if(isset($_GET['category']) && $_GET['category'] == 'Tea') echo ' selected'; ?>>Tea</option>
            <option value="Tea"<?php if(isset($_GET['category']) && $_GET['category'] == 'Fruit Tea') echo ' selected'; ?>>Fruit Tea</option>
            <option value="Pastry"<?php if(isset($_GET['category']) && $_GET['category'] == 'Americano') echo ' selected'; ?>>Americano</option>
            <option value="Pastry"<?php if(isset($_GET['category']) && $_GET['category'] == 'Cappuccino') echo ' selected'; ?>>Cappuccino</option>
            <option value="Pastry"<?php if(isset($_GET['category']) && $_GET['category'] == 'Latte') echo ' selected'; ?>>Latte</option>
            <option value="Pastry"<?php if(isset($_GET['category']) && $_GET['category'] == 'Mocha') echo ' selected'; ?>>Mocha</option>
            <option value="Pastry"<?php if(isset($_GET['category']) && $_GET['category'] == 'Esspresso') echo ' selected'; ?>>Esspresso</option>
            <option value="Pastry"<?php if(isset($_GET['category']) && $_GET['category'] == 'Frappe') echo ' selected'; ?>>Frappe</option>
            <option value="Pastry"<?php if(isset($_GET['category']) && $_GET['category'] == 'Iced coffee') echo ' selected'; ?>>Iced coffee</option>
            <option value="Pastry"<?php if(isset($_GET['category']) && $_GET['category'] == 'Meals') echo ' selected'; ?>>Meals</option>

            <!-- Add more categories as needed -->
         </select>
      </form>