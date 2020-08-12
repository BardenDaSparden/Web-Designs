from django.db import models
from django.utils import timezone


# Create your models here.
class Category(models.Model):
    title = models.CharField(max_length=200, default="")

    def __str__(self):
        return self.title


class Image(models.Model):
    path = models.CharField(max_length=512)
    name = models.CharField(max_length=200)

    def __str__(self):
        return self.name


class Post(models.Model):
    title = models.CharField(max_length=200, default="")
    content = models.TextField()
    published = models.DateTimeField("date published", default=timezone.now)
    categories = models.ManyToManyField(Category)

    def __str__(self):
        return self.title


class Project(models.Model):
    name = models.CharField(max_length=200, default="")
    description = models.CharField(max_length=200, default="")
    categories = models.ManyToManyField(Category)
    images = models.ManyToManyField(Image)
    content = models.TextField()
    published = models.DateTimeField("date published", default=timezone.now)

    def __str__(self):
        return self.name
