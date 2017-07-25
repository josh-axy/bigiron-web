from django.shortcuts import render
# from django.http import HttpResponse


def index(request):
    context = dict()
    return render(request, 'test.html', context)