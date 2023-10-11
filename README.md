# bad-webshop

## Exempel på attacker

### SQL-injections
#### Produktsidan
- Prova om appen är sårbar för SQL-injections genom att skriva ' i sökfältet för produkter
- Prova att visa inköpspriser genom att skriva `' UNION SELECT id, image_filename, title, purchase_price, price, description FROM products;-- ` i fältet för produktsök
- Prova att visa alla användare och lösenord genom att skriva `' UNION SELECT NULL, username, password, NULL, NULL, NULL from users;-- ` i fältet för produktsök

#### Inloggningssidan
- Prova att ta er igenom inloggningen genom att skriva `' OR 1=1;--` i fältet för användarnamn eller lösenord
- Prova att ta er igenom om ni vet ett användarnamn genom att skriva t.ex. `alice';--` i fältet för användarnamn

### Stored XSS (Lagra Javascript)
- Prova att spara egen javascript-kod i något av textfälten när ni skapar en ny produkt, besök sedan produktsidan för att se om ert skript körs i appen

### Filuppladdningsattack
- Prova att ladda upp en egen PHP-fil i uppladdningsfältet för bild, försök sedan att navigera till er fil för att få den att köras

### Övriga sårbarheter
- Försök att ladda ned hela databasen
- Kontrollera om det finns någon begränsning i antal inloggningsförsök
- Reflektera över hur användaruppgifter lagras i databasen och om det finns någon brist i hur komplexa lösenorden behöver vara
- Undersök om det finns data som skickas med GET-metoden där det är olämpligt
- Reflektera över vilka felmeddelanden som visas på olika ställen i webbapplikationen och om det kan finnas någon nackdel med vilken information som visas i felmeddelandena.
