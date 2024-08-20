@extends('layouts.app')

@section('title', 'Article Editor - Dashboard')

@section('main')
  <x-dashboard-layout active="article edit">
    <div class="row flex-fill">
      <div class="col-9 d-flex flex-column">
        <div class="mb-3">
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" aria-describedby="slug">
            <div id="slug" class="form-text d-flex align-items-center gap-3">
              <span class="d-flex gap-1 align-items-center">
                <i class="fa-regular fa-link"></i>
                Permalink
              </span>

              127.0.0.1:8000/articles/test-article
            </div>
          </div>
        </div>

        <div id="editor" class="flex-fill d-flex flex-column gap-1"></div>
      </div>

      <div class="col-3">
        <div class="d-flex flex-column gap-2 shadow-sm w-100 vh-100 position-sticky top-0 start-0">
          <div class="d-flex flex-wrap gap-1 p-3">
            <button type="button" class="btn flex-fill shadow-sm" id="textAdd">
              <i class="fa-regular fa-paragraph"></i>
            </button>
            <button type="button" class="btn flex-fill shadow-sm" id="headingAdd">
              <i class="fa-regular fa-heading"></i>
            </button>
            <button type="button" class="btn flex-fill shadow-sm">
              <i class="fa-regular fa-image"></i>             
            </button>
            <button type="button" class="btn flex-fill shadow-sm">
              <i class="fa-regular fa-link"></i>
            </button>
          </div>

          <div class="accordion accordion-flush" id="editorSettings">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#textSettings" aria-expanded="false" aria-controls="textSettings">
                  Text
                </button>
              </h2>

              <div id="textSettings" class="accordion-collapse collapse" data-bs-parent="#editorSettings">
                <div class="accordion-body">
                  <div class="d-flex mb-3">
                    <button type="button" class="btn flex-fill shadow-sm">
                      <i class="fa-regular fa-bold"></i>
                    </button>

                    <button type="button" class="btn flex-fill shadow-sm">
                      <i class="fa-regular fa-italic"></i>
                    </button>
                    
                    <button type="button" class="btn flex-fill shadow-sm">
                      <i class="fa-regular fa-font"></i>
                    </button>
                  </div>

                  <div>
                    <div class="row">
                      <div class="col-6 mb-3">
                        <select class="form-select" name="font-selector" aria-label="Default select example">
                          <option selected disabled>Font</option>
                          <option value="poppins">Poppins</option>
                          <option value="inter">Inter</option>
                          <option value="times new roman">Times New Roman</option>
                        </select>
                      </div>

                      <div class="col-6 mb-3">
                        <input type="number" class="form-control" name="text-size" value="16" placeholder="Text size">
                      </div>

                      <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between">
                          <div class="d-flex align-items-center">
                            <button type="button" class="btn">
                              <i class="fa-regular fa-align-left"></i>
                            </button>
  
                            <button type="button" class="btn">
                              <i class="fa-regular fa-align-center"></i>
                            </button>
  
                            <button type="button" class="btn">
                              <i class="fa-regular fa-align-right"></i>
                            </button>
  
                            <button type="button" class="btn">
                              <i class="fa-regular fa-align-justify"></i>
                            </button>
                          </div>

                          <div class="d-flex align-items-center">
                            <button type="button" class="btn">
                              <i class="fa-regular fa-outdent"></i>
                            </button>

                            <button type="button" class="btn">
                              <i class="fa-regular fa-indent"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#colorSettings" aria-expanded="false" aria-controls="colorSettings">
                  Color
                </button>
              </h2>
              <div id="colorSettings" class="accordion-collapse collapse" data-bs-parent="#editorSettings">
                <div class="accordion-body">
                  This is still a work in progress
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#projectSettings" aria-expanded="false" aria-controls="projectSettings">
                  Project
                </button>
              </h2>
              <div id="projectSettings" class="accordion-collapse collapse" data-bs-parent="#editorSettings">
                <div class="accordion-body">
                  <div class="d-flex flex-column gap-3">
                    <button type="button" class="btn flex-fill btn-primary d-flex align-items-center gap-2 justify-content-center">
                      <i class="fa-regular fa-save"></i>

                      Save Draft
                    </button>

                    <button type="button" class="btn flex-fill btn-success d-flex align-items-center gap-2 justify-content-center">
                      <i class="fa-solid fa-check"></i>

                      Publish Project
                    </button>

                    <button type="button" class="btn flex-fill btn-light d-flex align-items-center gap-2 justify-content-center">
                      <i class="fa-regular fa-folder"></i>

                      Archive Project
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-dashboard-layout>
@endsection
