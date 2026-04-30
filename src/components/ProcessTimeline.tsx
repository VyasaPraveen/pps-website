import { PROCESS } from "@/lib/site";

export function ProcessTimeline() {
  return (
    <div className="relative">
      <div className="absolute left-1/2 top-8 bottom-8 hidden lg:block w-px bg-gradient-to-b from-solar-300 via-solar-500 to-solar-300" aria-hidden />
      <div className="grid gap-6 lg:grid-cols-4">
        {PROCESS.map((step, i) => (
          <div
            key={step.step}
            className="relative rounded-3xl bg-white p-6 border border-solar-100 shadow-sm card-hover"
          >
            <div className="flex items-center gap-3">
              <span className="relative inline-flex h-12 w-12 items-center justify-center rounded-full sun-gradient text-white text-lg font-bold shadow-lg">
                {step.step}
              </span>
              <span className="text-xs uppercase tracking-widest text-slate-500 font-semibold">
                Step {i + 1}
              </span>
            </div>
            <h3 className="mt-4 text-lg font-bold text-sky-deep">{step.title}</h3>
            <p className="mt-2 text-sm text-slate-600 leading-relaxed">
              {step.description}
            </p>
          </div>
        ))}
      </div>
    </div>
  );
}
