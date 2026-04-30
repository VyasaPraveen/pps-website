"use client";

import { useState } from "react";
import { FAQS } from "@/lib/site";

export function FAQAccordion() {
  const [open, setOpen] = useState<number | null>(0);

  return (
    <div className="space-y-3">
      {FAQS.map((faq, i) => {
        const isOpen = open === i;
        return (
          <div
            key={faq.q}
            className={`rounded-2xl border transition-all ${
              isOpen
                ? "bg-white border-solar-300 shadow-md"
                : "bg-white/60 border-solar-100"
            }`}
          >
            <button
              type="button"
              onClick={() => setOpen(isOpen ? null : i)}
              aria-expanded={isOpen}
              className="w-full flex items-center justify-between gap-4 px-5 py-4 text-left"
            >
              <span className="font-semibold text-sky-deep">{faq.q}</span>
              <span
                className={`shrink-0 inline-flex h-8 w-8 items-center justify-center rounded-full transition-all ${
                  isOpen ? "bg-solar-500 text-white rotate-45" : "bg-solar-100 text-solar-600"
                }`}
              >
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round">
                  <path d="M12 5v14M5 12h14" />
                </svg>
              </span>
            </button>
            {isOpen && (
              <div className="px-5 pb-5 -mt-1">
                <p className="text-sm text-slate-600 leading-relaxed">{faq.a}</p>
              </div>
            )}
          </div>
        );
      })}
    </div>
  );
}
