# Steen WP

Khoi dong server:
docker-compose up

Tat server:
docker-compose down

# API

- Search color
  URL

```
http://localhost:3000/wp-json/wp/v2/the-gioi-mau-sac-cat?filter[meta_key]=colors_$_name&filter[meta_value]=######&filter[meta_compare]=like
```

Update ###### by color name

- Search location of agency

```
http://localhost:3000/wp-json/wp/v2/agency
```
