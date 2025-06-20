from locust import HttpUser, task, between
import random

class MyUser(HttpUser):
    wait_time = between(1, 3)

    @task(1)
    def create_random_product(self):
        product_data = {
            "name": f"Test Product {random.randint(1000, 9999)}",
            "price": random.randint(1000, 9999),
            "stock": random.randint(1, 50),
            "category_id": 3,
        }
        self.client.post("/api/products", json=product_data)

    @task(1)
    def create_random_category(self):
        category_data = {
            "name": f"Test Category {random.randint(1000, 9999)}",
            "description": "Locust test"
        }
        self.client.post("/api/categories", json=category_data)
