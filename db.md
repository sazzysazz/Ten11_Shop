table:
    user {
        - userID pk not null pk
        - username (vachar,20)
        - Email (Vachar,20)
        - Passeord (Vachar,20)
        - Profit (Vachar,20)
    }

    Logo {
        - LogoID int not  null pk
        - thumbnail (vacher,255)
    }

    category {
        - categoryID int not null pk
        - name (vachat,255)
    }

    Products {
        - proID int not null pk
        - user_id (Int,Fk)
        - cate_id (int,Fk)
        - proName (vachar, 255)
        - regular (float)
        - sale_price (float)
        - qty (int)
        - color (vachar 255)
        - size (vachar 255)
        - image (varchar)
        - description (longtext)
        - views (int)
        - 
    }