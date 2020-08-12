from django.urls import path
from . import views

app_name = "simple"

urlpatterns = [
    path("", views.home, name="home"),
    path("projects/", views.projects, name="projects"),
    path("projects/<int:id>", views.projects_id, name="projects_id"),
    path("ramblings/", views.ramblings, name="ramblings"),
    path("ramblings/<int:id>/", views.ramblings_id, name="ramblings_id"),
    path("category/<str:category>", views.by_category, name="category"),
    path("contact/", views.contact, name="contact")
]
