from django.http import HttpResponseRedirect
from django.shortcuts import render
# from .forms import NameForm
from .models import Post, Project, Category


# Create your views here.s
def home(request):
    context = {
        'posts': Post.objects.all,
        'categories': Category.objects.all,
        'projects': Project.objects.all
    }
    return render(request, 'simple/home.html', context)


def projects(request):
    context = {
        'projects': Project.objects.all
    }
    return render(request, 'simple/projects.html', context)


def projects_id(request, id):
    project = [Project.objects.get(pk=id)]
    context = {
        'projects': project
    }
    return render(request, 'simple/projects.html', context)


def category(request, category):
    projects = Project.objects.filter(categories=category)
    posts = Post.objects.all.filter(categories=category)
    context = {
        'projects': projects,
        'posts': posts
    }
    return render(request, 'simple/category.html', context)


def ramblings(request):
    context = {
        'posts': Post.objects.all
    }
    return render(request, 'simple/blog.html', context)


def ramblings_id(request, id):
    post = [Post.objects.get(pk=id)]
    context = {
        'posts': post
    }
    return render(request, 'simple/blog.html', context)


def by_category(request, category):
    return render(request, 'simple/category.html')


# def contact(request):
#     if request.method == 'POST':
#         form = NameForm(request.POST)
#     else:
#         form = NameForm()
#     return render(request, 'simple/contact.html', {'form': form})
#

def contact(request):
    context = {

    }
    return render(request, 'simple/contact.html', context);

# def get_name(request):
    # Process if POST
    # if request.method == 'POST':
