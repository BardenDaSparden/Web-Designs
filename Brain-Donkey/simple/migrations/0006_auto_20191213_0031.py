# Generated by Django 2.2.7 on 2019-12-13 06:31

from django.db import migrations, models
import django.utils.timezone


class Migration(migrations.Migration):

    dependencies = [
        ('simple', '0005_image_project'),
    ]

    operations = [
        migrations.AddField(
            model_name='project',
            name='categories',
            field=models.ManyToManyField(to='simple.Category'),
        ),
        migrations.AddField(
            model_name='project',
            name='description',
            field=models.CharField(default='', max_length=200),
        ),
        migrations.AddField(
            model_name='project',
            name='published',
            field=models.DateTimeField(default=django.utils.timezone.now, verbose_name='date published'),
        ),
    ]
